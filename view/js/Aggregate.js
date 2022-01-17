import App from "./App.js";

export default class Aggregate extends App {
    static render;

    static async get_words(words) {
        let gen_words = this.generate_words;

        words.forEach(function (e) {
            document.querySelector('.request-output-words tr').insertAdjacentHTML("beforeBegin", gen_words(e));
        });
    }

    static generate_words(e) {
         return `
            <th data-id="${e.id}"><span>\(^⌂^)/</span></th>
            <td>
                <div class="input-group">
                    <input type="text" class="form-control word_orig-input-edit" placeholder="Original" aria-label="Username" value="${e.Word_origin}">
                </div>
            </td>
            <td>
                <div class="input-group">
                    <input type="text" class="form-control word_trans-input-edit" placeholder="Translate" aria-label="Username" value="${e.Word_translate}">
                </div>
            </td>
            <td>
                <button type="button" class="btn btn-info submit-update-word">Update</button>
            </td>
            <td>
                <button type="button" class="btn btn-danger submit-remove-word">Delete</button>
            </td>
        `;
    }

    static eventInsert() {
        let user_value = this.get_user_value(),
            data_send = `word_orig=${user_value.Word_origin}&word_trans=${user_value.Word_translate}`;

        return this.request(data_send,  () => {});
    }

    static get_user_value() {
        let word_orig = document.querySelector('.word_orig-input').value,
            word_trans = document.querySelector('.word_trans-input').value,
            error_text = document.querySelector('.word_orig-error');
        if(!this.validate_value(word_orig, error_text)) return false;
        return {'Word_origin' : word_orig, 'Word_translate': word_trans};
    }

    static eventDelete(element) {
        let tag_tr = element.closest('tr'),
            id = 'id=';

        id += tag_tr.querySelector('th').getAttribute('data-id');

        return this.request(id, function () {
            tag_tr.remove();
        });
    }

    static eventUpdate(element) {
        let word_orig = element.closest('tr').querySelector('.word_orig-input-edit'),
            word_trans = element.closest('tr').querySelector('.word_trans-input-edit'),
            word_id = element.closest('tr').querySelector('th').getAttribute('data-id');
        return this.request(`word_id=${word_id}&word_orig=${word_orig.value}&word_trans=${word_trans.value}`, function () {});
    }

    static request(data_send, cleanInputs) {
        return new Promise((resolve, reject) => {
            this.requestToBack('POST', HTTP => {
                HTTP.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HTTP.onreadystatechange = () => {
                    if(HTTP.readyState === 4 && HTTP.status === 200) {
                        resolve(HTTP.responseText);
                        cleanInputs();
                    } else {
                        reject('Error upload')
                    }
                }
            }, data_send, false);
        });
    }
}

