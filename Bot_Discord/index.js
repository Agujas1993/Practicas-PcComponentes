const express = require('express')
const app = express()
 
app.get('/', function (req, res) {
  res.send('Hello World')
})
 let port = process.env.PORT || 3000;
app.listen(port)
 
require('dotenv').config()


const Discord = require("discord.js");
const client = new Discord.Client();

var nA = "Estamos trabajando en ello..."

function presence(){
  client.user.setPresence({
        status:"online",
        activity: {
            name: "Aprendiendo algo de programación",
            type: "PLAYING"
        }
    })
}
client.on("ready", () =>{
    console.log("Hola soy el pato");
    presence();
});

function getDateTime() {

    var date = new Date();

    var hour = date.getHours() + 2;
    hour = (hour < 10 ? "0" : "") + hour;

    var min  = date.getMinutes();
    min = (min < 10 ? "0" : "") + min;

    var sec  = date.getSeconds();
    sec = (sec < 10 ? "0" : "") + sec;

    var year = date.getFullYear();

    var month = date.getMonth() + 1;
    month = (month < 10 ? "0" : "") + month;

    var day  = date.getDate();
    day = (day < 10 ? "0" : "") + day;

    return year + "-" + month + "-" + day + " " + hour + ":" + min + ":" + sec;

}


function getDate() {

    var date = new Date();

    var month = date.getMonth() + 1;
    month = (month < 10 ? "0" : "") + month;

    var day  = date.getDate() + 1;
    day = (day < 10 ? "0" : "") + day;

    return day  + "-" + month;

}

client.on("message", (message) => {

var Mensajes = ["Qué tal?", "Holaa", "Vamos a programar"];
var aleatorio = Math.floor(Math.random()*(Mensajes.length));

if(message.content.startsWith("?")) {
        message.channel.send("Los comandos son: Time, !, patoo, holaa, xd, bd, Hasta mañana");
    }

  if(message.content.startsWith("Time")) {
        message.channel.send(getDateTime());
    }

    if(message.content.startsWith("tomorrow")) {
        message.channel.send(getDate());
    }
    if(message.content.startsWith("!")) {
        message.channel.send("Quack");
    }
    if(message.content.startsWith("patoo")) {
        message.channel.send(Mensajes[aleatorio]);
    }
     if(message.content.startsWith("xd")) {
        message.channel.send(":)");
    }
    if(message.content.startsWith("holaa")) {
        message.channel.send("Buenas compañer@");
    }

    if(message.content.startsWith("bd")){
        const img = new Discord.MessageAttachment('https://perrosgatosonline.com/wp-content/uploads/2018/08/Bulldog-ingles9.png')
        message.channel.send(img);
         message.channel.send("Bull dog for you");
    }

    if(message.content.startsWith("Hasta mañana")){
        const img = new Discord.MessageAttachment('https://static.paraloscuriosos.com/img/articles/8731/470x470/orig.58481020f3fd7_giphy_6.gif')
        message.channel.send(img);
         message.channel.send("Wenas noches");
    }

});