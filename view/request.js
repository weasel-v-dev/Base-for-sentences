const BASE_URL = document.querySelector('body').getAttribute('data-url');
const FULL_URL = BASE_URL + '/controllers/main.php';

class Request {

    static error_text = document.querySelector('.form-text');
    static word_output = document.querySelector('.word-output');

    static validate_value(value) {
        if(value !== undefined && value !== null && value.match(/^[A-Za-z]+$/)) {
            console.log('validate_value');
            this.error_text.style = 'display: none';
            return true;
        } else {
            this.error_text.style = 'display: block';
            return false;
        }
    }

    static requestToBack(value) {
        let word_output = this.word_output;
        console.log('requestToBack');
        value = 'word=' + value;
        const HTTP = new XMLHttpRequest();
        HTTP.open('POST', FULL_URL, true);
        HTTP.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        HTTP.send(value);
        HTTP.onreadystatechange = function() {
            if(HTTP.readyState === 4 && HTTP.status === 200) {
                word_output.innerHTML = HTTP.responseText === '1' ? 'Complete' : 'Wrong'
            }
        };
    }

    static eventSubmit() {
        let value = document.querySelector('.word-input').value;
        if(!this.validate_value(value)) return false;
        console.log('eventSubmit2');
        this.requestToBack(value);
    }

}

document.querySelector('.submit').onclick = function () {
    Request.eventSubmit();
};



// setTimeout(function () {
//     word_output.innerHTML = HTTP.responseText === '1' ? 'Complete' : 'Wrong';
// }, 1700);