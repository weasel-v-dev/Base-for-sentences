import Exercise from "./Exercise.js";
import Aggregate from "./Aggregate.js";
import App from "./App.js";

App.requestToBack('GET', HTTP => {
    HTTP.responseType = "text";
    HTTP.onload = () => {
        if(HTTP.readyState === 4 && HTTP.status === 200) {
            let data = JSON.parse(HTTP.responseText);
            App.data_words = data['few_words'];
            Exercise.outputOnHtml(Exercise.data_words[Exercise.iteration].word_translate);
            Aggregate.writeWords(data['few_words']);
            Aggregate.count_buttons = data['all_count_words'];
            Aggregate.writePagination(1);
            render();
        }
    };
});

function render() {
    document.querySelector('.submit-add-word').onclick = function() {
        Aggregate.eventInsert().then(id => {
            let objectWord = Aggregate.get_user_value();
            objectWord.id = id;
            if (Aggregate.current_button === 1) {
                document.querySelector('.request-output-words tr').insertAdjacentHTML("beforeBegin", Aggregate.generate_words(objectWord));
            }
            document.querySelector('.word_orig-input').value = '';
            document.querySelector('.word_trans-input').value = '';
            render();
        })
    };

    document.querySelector('.submit').onclick = function() {
        Exercise.eventSimilar(this);
    };

    document.querySelector('.open-modal').onclick = function() {
        document.querySelector('.inside').classList.add('show-top');
        document.querySelector('.outside').classList.add('show');
    };

    document.querySelector('.exit').onclick = function() {
        document.querySelector('.inside').classList.remove('show-top');
        document.querySelector('.outside').classList.remove('show');
    };

    document.querySelectorAll('.submit-remove-word').forEach( function(element)  {
        element.onclick = function() {
            Aggregate.eventDelete(this).then(response => {
                console.log(response);
            })
        }
    });

    document.querySelectorAll('.submit-update-word').forEach( function(element)  {
        element.onclick = function() {
            Aggregate.eventUpdate(this).then(response => {
                console.log(response);
            })
        }
    });

    document.querySelectorAll('.pagination .page-item').forEach( function(element)  {

        element.onclick = function() {
            console.log('LOADING...');
            Aggregate.eventPagination(this).then(data => {
                if(typeof data === "string") {
                    data = JSON.parse(data);
                    App.data_words = data['few_words'];
                    Aggregate.writeWords(data['few_words']);
                    console.log('LOADED');
                    render();
                }
            })
        }
    });
}
render();