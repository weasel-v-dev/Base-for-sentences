const BASE_URL = document.querySelector('body').getAttribute('data-url');
const FULL_URL = BASE_URL + 'connect.php';

export default class App {
    static data_words;

    static validate_value(value, exitMessage) {
        if(
            value !== undefined &&
            value !== null &&
            value !== '' &&
            value.match(/^([^0-9]*)$/g)) {
            exitMessage.innerHTML = '';
            return true;
        } else {
            exitMessage.innerHTML = 'Wrong text!';
            return false;
        }
    }

    static cleanInputs() {
        return false;
    }

    static request(data_send, cleanInputs = this.cleanInputs) {
        return new Promise((resolve, reject) => {
            this.requestToBack('POST', HTTP => {
                HTTP.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                HTTP.onreadystatechange = () => {
                    if(HTTP.readyState === 4 && HTTP.status === 200) {
                        console.log(HTTP.responseText);
                        resolve(HTTP.responseText);
                        cleanInputs();
                    } else {
                        reject('Error upload')
                    }
                }
            }, data_send, false);
        });
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
}