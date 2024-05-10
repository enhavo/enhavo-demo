import { Controller } from "@hotwired/stimulus";
import * as $ from 'jquery';
export default class extends Controller
{
    connect()
    {
        console.log("Hello, Stimulus!")
        $(this.element).hide()
    }

}