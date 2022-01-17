const BASE_URL = document.querySelector('body').getAttribute('data-url');
const FULL_URL = BASE_URL + 'connect.php';

export default class App {
    static array_value;

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