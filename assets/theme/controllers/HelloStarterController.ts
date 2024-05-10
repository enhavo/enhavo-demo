import { Controller } from "@hotwired/stimulus";
import * as $ from 'jquery';
export default class extends Controller
{
    connect()
    {
        console.log(this.element);
        console.log("Hello, world!")
        // $(this.element).hide()
        $(this.element) .on('click' )
    }

}