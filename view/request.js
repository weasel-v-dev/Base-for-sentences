const BASE_URL = document.querySelector('body').getAttribute('data-url');
const FULL_URL = BASE_URL + 'connect.php';

class Request {
    static array_value;
    static iteration = 0;
    static error_text = document.querySelector('.form-text');
    static word_output = document.querySelector('.word-output');

    static validate_value(value) {
        if(
            value !== undefined &&
            value !== null &&
            value !== '' &&
            value.match(/^([^0-9]*)$/g)) {
                this.error_text.innerHTML = '';
                return true;
        } else {
            this.error_text.innerHTML = 'Wrong text!';
            return false;
        }
    }

    static outputOnHtml (text) {
        this.word_output.innerHTML = text;
    }

    static similar_text (word_right, word_maybe_right) {
        let result = 0;
        let text_send = 'word_truth='+word_right+'&word_maybe_truth='+word_maybe_right;
        this.requestToBack('POST', function (HTTP) {
            HTTP.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            HTTP.onreadystatechange = () => {
                if(HTTP.readyState === 4 && HTTP.status === 200) {
                    result = HTTP.responseText;
                }
            }
        }, text_send, false);
        return result;
    }

    static requestToBack(method, callback, data = false, async = true) {
        const HTTP = new XMLHttpRequest();
        HTTP.open(method, FULL_URL, async);
        callback(HTTP);
        if(data) {
            HTTP.send(data);
        } else {
            HTTP.send();
        }
    }

    static async eventSubmit(btn) {
        let input_word = document.querySelector('.word-input');
        if(!this.validate_value(input_word.value)) return false;
        if(this.array_value.length -1 <= this.iteration) {
            console.log(this.array_value[this.iteration].Word_origin);
            this.outputOnHtml('Over');
            input_word.setAttribute('disabled', 'disabled');
            btn.parentElement.innerHTML = '<a href="/" class="btn btn-success w-100 submit">Reload</a>';

            return false;
        }
        let resultFromDB = this.similar_text(this.array_value[this.iteration].Word_origin, input_word.value);
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

document.querySelector('.submit').onclick = function () {
    Request.eventSubmit(this);
}
Request.requestToBack('GET', function (HTTP) {
    HTTP.responseType = "text";
    HTTP.onload = function() {
        if(HTTP.readyState === 4 && HTTP.status === 200) {
            // console.log(HTTP.responseText);
            // console.log(JSON.parse(HTTP.responseText));
            Request.array_value = JSON.parse(HTTP.responseText);
            Request.outputOnHtml(Request.array_value[0].Word_translate);
        }
    };
});