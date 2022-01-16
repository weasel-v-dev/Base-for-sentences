import App from "./App.js";

export default class Aggregate extends App {
    static get_words (words) {
        this.generate_words(words);
    }

    static generate_words(words) {
        let i = 1;
        words.forEach(function (e) {
            document.querySelector('.request-output-words').innerHTML += `
                <tr>
                    <th><span>${i}</span></th>
                    <td>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Original" aria-label="Username" value="${e.Word_origin}">
                        </div>
                    </td>
                    <td>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Translate" aria-label="Username" value="${e.Word_translate}">
                        </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-info">Update word</button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger">Delete word</button>
                    </td>
                </tr>
            `;
            i++;
        });
    }

    static eventInsert (word_orig, word_trans) {
        let reqToBack = this.requestToBack;
        let text_send = `word_orig=${word_orig}&word_trans=${word_trans}`;
        return new Promise(function (resolve, reject) {
            reqToBack('POST', HTTP => {
                HTTP.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HTTP.onreadystatechange = () => {
                    if(HTTP.readyState === 4 && HTTP.status === 200) {
                        resolve(HTTP.responseText);
                    } else {
                        reject('Error upload')
                    }
                }
            }, text_send, false);
        });
    }
}