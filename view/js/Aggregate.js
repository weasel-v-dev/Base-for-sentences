import App from "./App.js";

export default class Aggregate extends App {
    static count_buttons = 0;

    static async writeWords(words) {
        let $this = this;
        document.querySelector('.request-output-words').innerHTML = '<tr></tr>';
        words.forEach(function (e) {
            document.querySelector('.request-output-words tr').insertAdjacentHTML("beforeBegin", $this.generate_words(e));
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

    static writePagination(current_button) {
        document.querySelector('.pagination').innerHTML = this.generatePagination(current_button);
    }


    static generatePagination(current_button) {
        let html_pagination = ``,
            dots_show = this.count_buttons > 8,
            dots_once = true,
            status_button_prev = current_button <= 1 ? 'disabled' : '',
            status_button_next = current_button >= this.count_buttons ? 'disabled' : '';
        html_pagination += `<li class="page-item ${status_button_prev}" ${status_button_prev}><span class="page-link page-link-previous" ${status_button_prev}>Previous</span></li>`;
        for (let i = 1; i <= this.count_buttons; i++) {
            if (dots_show ===  true && (i >= 6) && (i <= (this.count_buttons - (6 - 1)))) {
                if(dots_once ===  true) {
                    html_pagination += `<li class="page-item"><span class="page-link">...</span></li>`;
                    dots_once = false;
                }
                continue;
            }
            html_pagination += `<li class="page-item ${i === current_button ? 'active' : ''}"><span class="page-link">${i}</span></li>`;
        }
        html_pagination += `<li class="page-item ${status_button_next}" ${status_button_next}><span class="page-link page-link-next"  ${status_button_next}>Next</span></li>`;

        return html_pagination;
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

    static eventPagination(button) {
        let current_button = button.querySelector('.page-link').innerText,
            count_elements_on_page = 10;


        switch (current_button) {
            case 'Previous' :
                current_button =  parseInt(document.querySelector('.pagination .active .page-link').innerText);

                console.log(current_button);
                if(current_button > 1) {
                    current_button--;
                }

                break;
            case 'Next' :
                current_button =  parseInt(document.querySelector('.pagination .active .page-link').innerText);

                if(current_button < this.count_buttons) {
                    current_button++;
                }
                break;
        }
        this.writePagination(parseInt(current_button));

        return this.request(`number_page=${current_button}&count_elements_on_page=${count_elements_on_page}`, function () {});
    }

}

