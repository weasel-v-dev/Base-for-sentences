import Exercise from "./Exercise.js";
import Aggregate from "./Aggregate.js";
import App from "./App.js";

function renderPage() {
    App.requestToBack('GET', HTTP => {
        HTTP.responseType = "text";
        HTTP.onload = () => {
            if(HTTP.readyState === 4 && HTTP.status === 200) {
                let data = JSON.parse(HTTP.responseText);
                App.array_value = data;
                Exercise.outputOnHtml(Exercise.array_value[Exercise.iteration].Word_translate);
                Aggregate.get_words(data);
            }
        };
    });
}

document.querySelector('.submit').onclick = function() {
    Exercise.eventSimilar(this).then(r => console.log(r));
};
document.querySelector('.submit-add-word').onclick = function() {
    Aggregate.eventInsert('sunset', 'захід сонця').then(e => {
        console.log(e);
        renderPage();
    })
};

renderPage();

document.querySelector('.open-modal').onclick = function() {

    document.querySelector('.inside').classList.add('show-top');
    document.querySelector('.outside').classList.add('show');
}
document.querySelector('.exit').onclick = function() {

    document.querySelector('.inside').classList.remove('show-top');
    document.querySelector('.outside').classList.remove('show');
}

