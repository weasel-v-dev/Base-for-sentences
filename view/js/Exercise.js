import App from "./App.js";

export default class Exercise extends App {
    static iteration = 0;
    static error_text = document.querySelector('.form-text');
    static word_output = document.querySelector('.word-output');

    static outputOnHtml (text) {
        this.word_output.innerHTML = text;
    }

    static get_similar_text (word_right, word_maybe_right) {
        let result = 0;
        let text_send = `word_truth=${word_right}&word_maybe_truth=${word_maybe_right}`;
        this.requestToBack('POST', HTTP => {
            HTTP.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            HTTP.onreadystatechange = () => {
                if(HTTP.readyState === 4 && HTTP.status === 200) {
                    result = HTTP.responseText;
                }
            }
        }, text_send, false);
        return result;
    }

    static async eventSimilar(btn) {
        let input_word = document.querySelector('.word-input');
        if(!this.validate_value(input_word.value, this.error_text)) return false;
        if(this.array_value.length -1 <= this.iteration) {
            await new Promise(r => setTimeout(r, 2000));
            this.outputOnHtml('Over');
            input_word.setAttribute('disabled', 'disabled');
            btn.parentElement.innerHTML = '<a href="/" class="btn btn-success w-100 submit">Reload</a>';
            return false;
        }
        let resultFromDB = this.get_similar_text(this.array_value[this.iteration].Word_origin, input_word.value);
        if(resultFromDB) {
            this.outputOnHtml('Success');

            if(this.array_value[this.iteration].Word_origin.length > resultFromDB) {
                this.error_text.innerHTML = this.array_value[this.iteration].Word_origin;
            }

            input_word.value = '';

            if(this.array_value.length > this.iteration) {
                await new Promise(r => setTimeout(r, 2000));
                this.error_text.innerHTML = '';
                this.iteration++;
                this.outputOnHtml(this.array_value[this.iteration].Word_translate);
            }
        } else {
            this.outputOnHtml('Wrong');
            this.error_text.innerHTML = '';
            await new Promise(r => setTimeout(r, 2000));
            this.outputOnHtml(this.array_value[this.iteration].Word_translate);
        }
    }
}

