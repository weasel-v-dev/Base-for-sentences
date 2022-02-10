import App from "./App.js";

export default class Exercise extends App {
    static iteration = 0;
    static error_text = document.querySelector('.form-text');
    static word_output = document.querySelector('.word-output');

    static outputOnHtml(text) {
        this.word_output.innerHTML = text;
    }

    static async getSimilarText(word_right, word_maybe_right) {
        console.log(`word_truth=${word_right}&word_maybe_truth=${word_maybe_right}`);
        return await this.request(`word_truth=${word_right}&word_maybe_truth=${word_maybe_right}`);
    }

    static async eventSimilar(btn) {
        let input_word = document.querySelector('.word-input');

        if(!this.validate_value(input_word.value, this.error_text)) {
            return false;
        }
        /*
        * If all words are complete then show reload button
        */
        if(this.data_words.length -1 <= this.iteration) {
            await new Promise(r => setTimeout(r, 2000));
            this.outputOnHtml('Over');
            input_word.setAttribute('disabled', 'disabled');
            btn.parentElement.innerHTML = '<a href="/" class="btn btn-success w-100 submit">Reload</a>';
            return false;
        }

        this.getSimilarText(this.data_words[this.iteration].word_origin, input_word.value).then(async resultFromDB => {
            if(resultFromDB) {
                this.outputOnHtml('Success');

                if(this.data_words[this.iteration].word_origin.length > resultFromDB) {
                    this.error_text.innerHTML = this.data_words[this.iteration].word_origin;
                }

                input_word.value = '';

                if(this.data_words.length > this.iteration) {
                    await new Promise(r => setTimeout(r, 2000));
                    this.error_text.innerHTML = '';
                    this.iteration++;
                    this.outputOnHtml(this.data_words[this.iteration].word_translate);
                }
            } else {
                this.outputOnHtml('Wrong');
                this.error_text.innerHTML = '';
                await new Promise(r => setTimeout(r, 2000));
                this.outputOnHtml(this.data_words[this.iteration].word_translate);
            }
        });


    }
}

