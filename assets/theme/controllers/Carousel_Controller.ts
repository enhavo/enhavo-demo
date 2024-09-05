import {Controller} from "@hotwired/stimulus";
import * as $ from 'jquery';


export default class extends Controller {
    static targets = ["track", "slide", "navButton"];

    connect() {
       console.log(this.element)
    }

}