import Container from "@enhavo/dependency-injection"
import WysiwygConfig from "@enhavo/form/Type/WysiwygConfig";

WysiwygConfig.set('default', {
    toolbar1: "undo redo | bold italic removeformat | alignleft aligncenter alignright |link bullist searchreplace code | styleselect",
    formats: {
        bold: {inline: 'strong'},
        italic: {inline: 'em'},
    },
    style_formats: [
        { title: 'Paragraph', block: 'p' },
        { title: 'H1', block: 'h1' },
        { title: 'H2', block: 'h2' },
        { title: 'H3', block: 'h3' }
    ],
    max_height: 750,
    paste_as_text: true,
    contextmenu: "",
    language: 'en'
});

(async () => {
    await Container.init();
    (await Container.get('@enhavo/app/Form/FormApp')).init();
    (await Container.get('@enhavo/app/Vue/VueApp')).init('app', await Container.get('@enhavo/app/Form/Components/FormComponent.vue'));
})();
