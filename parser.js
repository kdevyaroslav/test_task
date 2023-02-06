const express = require("express");
const puppeteer = require("puppeteer");
const app = express();

app.get("/", async function (request, response) {
    const browser = await puppeteer.launch();
    const page = await browser.newPage();

    await page.goto('https://rozetka.com.ua/ua/news-articles-promotions/promotions/');
    await page.setViewport({ width: 1080, height: 1024 });

    const promoGrid = '.promo-grid';
    await page.waitForSelector(promoGrid);

    const imgs = await page.$$eval('.promo-grid img[src]', imgs => imgs.map(img => img.getAttribute('src')));

    console.log(imgs);

    await browser.close();

    response.send(imgs);
});

app.listen(3000);