import Exercise from "./Exercise.js";
import Aggregate from "./Aggregate.js";
import App from "./App.js";

App.requestToBack('GET', HTTP => {
    HTTP.responseType = "text";
    HTTP.onload = () => {
        if(HTTP.readyState === 4 && HTTP.status === 200) {
            console.log(HTTP.responseText);
            let data = JSON.parse(HTTP.responseText);

            App.array_value = data;
            Exercise.outputOnHtml(Exercise.array_value[Exercise.iteration].Word_translate);
            Aggregate.get_words(data);

            render();
        }
    };
});

document.querySelector('.submit-add-word').onclick = function() {
    Aggregate.eventInsert().then(id => {

        let obj = Aggregate.get_user_value();
        obj.id = id;
        console.log(obj);
        document.querySelector('.request-output-words tr').insertAdjacentHTML("beforeBegin", Aggregate.generate_words(obj));
        document.querySelector('.word_orig-input').value = '';
        document.querySelector('.word_trans-input').value = '';
        render();
    })
};


function render() {
    document.querySelector('.submit').onclick = function() {
        Exercise.eventSimilar(this).then(r => console.log(r));
    };

    document.querySelector('.open-modal').onclick = function() {
        document.querySelector('.inside').classList.add('show-top');
        document.querySelector('.outside').classList.add('show');
    };

    document.querySelector('.exit').onclick = function() {
        document.querySelector('.inside').classList.remove('show-top');
        document.querySelector('.outside').classList.remove('show');
    };

    document.querySelectorAll('.submit-remove-word').forEach( function(e)  {
        e.onclick = function() {
            Aggregate.eventDelete(this).then(e => {
                console.log(e);
            })
        }
    });

    document.querySelectorAll('.submit-update-word').forEach( function(e)  {
        e.onclick = function() {
            console.log(this);
            Aggregate.eventUpdate(this).then(e => {
                console.log(e);
            })
        }
    });
}

Aggregate.render = render;




