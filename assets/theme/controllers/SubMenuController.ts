import { Controller } from "@hotwired/stimulus";
import * as $ from 'jquery';
import hello_Controller from "./Hello_Controller";
export default class extends Controller {
    // static targets=["hiddenContent"]
    connect() {
        console.log("vlog1","vlog2","vlog3","vlog4",this.element)
    // this.hiddenContentTarget.hidden = true
    }

    greet() {
        console.log("you press the page")
        // in this action i just grab this sub-menu-ul which is the parent of my sub-menu-list. then i add
        // toggle clas in which if i click to button it will togle the list of the ul.
        // then i just add the class open in which i also add in my css for the list of ul to be displayed
        $(".sub-menu-ul").toggleClass("open");
        $(".menu").css({
            "background":"#171717"
        })
        $(".first-label2").css({
            "font-weight": "bold"
        })

    }
    KeyboardKey(event){
        console.log("you press enter")
    }
    button(){
        console.log("nav item")
        $(".navigation1").toggleClass("blow");
        $(".nav-item").css({
            "margin-bottom":"1px solid gray"
        });
        // $(".nav-item").css({
        //     "border-bottom":"2px solid gray","width":"100%","padding":"2rem"
        // });
        // $(".number").toggleClass("blow");
    }
}