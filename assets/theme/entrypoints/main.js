import container from "../container.di.yaml";
import {Kernel} from "@enhavo/app/kernel/Kernel";
import '../styles/base.scss'
import "fantasticon:icon";

let kernel = new Kernel(container);
kernel.boot();
