<?php

namespace App\Block;

use App\Entity\Block\JobsBlock;
use App\Factory\Block\JobsBlockFactory;
use App\Form\Type\Block\JobsBlockType as JobsBlockFormType;
use App\Repository\JobsRepository;
use Enhavo\Bundle\ApiBundle\Data\Data;
use Enhavo\Bundle\BlockBundle\Block\AbstractBlockType;
use Enhavo\Bundle\BlockBundle\Model\BlockInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobsBlockType extends AbstractBlockType
{
    public function __construct(
        private readonly JobsRepository $jobsRepository,
    ) {
    }

    public function createViewData(BlockInterface $block, Data $data, $resource, array $options)
    {
        if (!$block instanceof JobsBlock) {
            return;
        }

        $limit = $block->getItemsPerPage();
        $tagNames = [];
        foreach ($block->getTags() as $tag) {
            if ($tag->getName()) {
                $tagNames[] = $tag->getName();
            }
        }

        $jobs = match ($block->getMode()) {
            // Only jobs whose Abteilung matches one of the block's tags.
            'tags' => $this->jobsRepository->findPublicJobs($tagNames, $limit),
            // Hand-picked jobs — selection UI to be added later.
            'custom' => [],
            // 'all' (and null/default): every public job.
            default => $this->jobsRepository->findPublicJobs([], $limit),
        };

        // Distinct job types (Jobs::title) across the shown jobs, used for the filter list.
        $filterTypes = [];
        foreach ($jobs as $job) {
            if ($job->getTitle()) {
                $filterTypes[$job->getTitle()] = true;
            }
        }

        $data['jobs'] = $jobs;
        $data['jobTypes'] = array_keys($filterTypes);
    }

    public function configureOptions(OptionsResolver $optionsResolver): void
    {
        $optionsResolver->setDefaults([
            'model' => JobsBlock::class,
            'form' => JobsBlockFormType::class,
            'factory' => JobsBlockFactory::class,
            'template' => 'theme/block/jobs.html.twig',
            'label' => 'Jobs Offer',
            'translationDomain' => null,
            'groups' => ['layout'],
        ]);
    }

    public static function getName(): ?string
    {
        return 'jobs_offer';
    }
}
