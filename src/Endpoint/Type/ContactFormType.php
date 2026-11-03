<?php

namespace App\Endpoint\Type;

use App\Entity\ContactForm;
use App\Form\Type\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Enhavo\Bundle\ApiBundle\Data\Data;
use Enhavo\Bundle\ApiBundle\Endpoint\AbstractEndpointType;
use Enhavo\Bundle\ApiBundle\Endpoint\Context;
use Enhavo\Bundle\AppBundle\Endpoint\Type\AreaEndpointType;
use Enhavo\Bundle\SettingBundle\Setting\SettingManager;
use Enhavo\Bundle\VueFormBundle\Form\VueForm;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/contact-form', name: 'contact_form', defaults: [])]

class ContactFormType extends AbstractEndpointType
{
    public function __construct(
        private readonly VueForm $vueForm,
        private FormFactoryInterface $formFactory,
        private readonly EntityManagerInterface $entityManager,
        private readonly SettingManager $settingManager,
        private readonly MailerInterface $mailer,
        private readonly string $mailerFrom,
        private readonly string $mailerTo,
    ) {}

    public function handleRequest($options, Request $request, Data $data, Context $context)
    {
        $newContact = new ContactForm();
        $form = $this->formFactory->createNamed('contact', ContactType::class, $newContact,[
            'action' => $this->generateUrl('contact_form'),
            'disclaimer_label' => $this->settingManager->getValue('contact_disclaimer'),
        ]);
        $form->handleRequest($request);
        //------- if form is not submitted we show the contact form always ------------
        if (!$form->isSubmitted()){
            $data->set('form', $this->vueForm->createData($form->createView()));
            return;
        }
        //------------------------------------------------
        if (!$form->isValid()) {
            $errors = [];
            foreach ($form->getErrors(true) as $error) {
                $errors[] = [
                    'field' => $error->getOrigin()->getName(),
                    'message' => $error->getMessage(),
                ];
            }
            $context->setResponse(new JsonResponse([
                'success' => false,
                'message'=>'Validation failed',
                'errors' => $errors,
                'form' => $this->vueForm->createData($form->createView()),
            ],422));
            return;
        }
        $this->entityManager->persist($newContact);
        $this->entityManager->flush();

        // submission is saved — respond success regardless of the e-mail outcome
        $context->setResponse(new JsonResponse([
            'success' => true,
            'message' => $this->settingManager->getValue('contact_success_message'),
            'redirect' => '/success',
        ]));

        // recipient from the setting, falling back to the env (MAILER_TO) if unset
        $recipient = $this->settingManager->getValue('email_notification') ?: $this->mailerTo;
        $subject = $this->settingManager->getValue('contact_email_subject') ?: 'Neue Kontaktanfrage';

        // notify the site owner (best-effort; a mail failure must not affect the user)
//        try {
//            $email = (new TemplatedEmail())
//                ->from($this->mailerFrom)
//                ->to($recipient)
//                ->subject($subject)
//                ->htmlTemplate('mail/contact.html.twig')
//                ->context(['contact' => $newContact]);
//
//            $this->mailer->send($email);
//        } catch (\Throwable $e) {
            // a mail failure must not break an otherwise valid submission
//        }
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'preview'=>false,
            'template'=>'theme/block/contact-form-page.html.twig',
        ]);
    }
    public static function getParentType(): ?string
    {
        return AreaEndpointType::class;
    }
}