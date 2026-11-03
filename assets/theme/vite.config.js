import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import liveReload from 'vite-plugin-live-reload'
import path from 'node:path'
import 'dotenv/config'
import containerDIPlugin from '@enhavo/app/vite/rollup-plugin-container-di'
import {fantasticon} from "@enhavo/app/vite/fantasticon-plugin/plugin.js";
import {fantasticonSetting} from "@enhavo/app/vite/fantasticon-settings.js";

export default defineConfig({

    optimizeDeps: {
        include: [
            'axios',
            'uuid/v4',
            'vuedraggable',
            'jquery',
            'slick-carousel',
            'async',
            'pako',
            'lodash',
            'ansi-to-html',
            'jexl',
            'blueimp-file-upload',
            'icheck',
            'html-entities',
            'expression-language/lib/index',
            'vue-router'
        ],
    },

    plugins: [
        vue(),
        liveReload([
            __dirname + '/../../src/**/*.php',
            __dirname + '/../../templates/**/*.twig',
        ]),
        containerDIPlugin(),
        fantasticon(fantasticonSetting({
            inputDir: path.resolve(__dirname, 'assets/icons'),
            outputDir: path.resolve(__dirname, '../../public/build/theme'),
            codepoints: {
                'cta-arrow': 0xf002,
                'arrow-list': 0xf003,
            }
        })),
    ],

    // config
    root: path.resolve(__dirname),
    base: '/build/theme',
    build: {
        // output dir for production build
        outDir: '../../public/build/theme',
        emptyOutDir: true,

        // emit manifest so PHP can find the hashed files
        manifest: true,

        rollupOptions: {
            input: '/entrypoints/main.js'
        }
    },
    server: {
        host: '127.0.0.1',
        strictPort: true,
        port: process.env.VITE_THEME_PORT,
        origin: 'http://localhost:' + process.env.VITE_THEME_PORT,
        cors: true,
    },
    resolve: {
        dedupe: ['jquery'],
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js'
        }
    }
})
