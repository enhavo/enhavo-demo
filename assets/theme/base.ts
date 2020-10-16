import "./styles/style.scss"

import Theme from "./lib/Theme";
import * as $ from "jquery";

$(() => {
    (new Theme()).init(document.body);
});
