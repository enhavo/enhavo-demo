import { Kernel } from "@enhavo/app/kernel/Kernel";
import container from "../container.di.yaml";
import "../assets/fonts/icons.font";
import "../styles/base.scss";

let kernel = new Kernel(container);
kernel.boot();
