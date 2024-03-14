const express = require("express");
const { engine } = require("express-handlebars");
const path = require("path");
const methodOverride = require("method-override");
const cors = require("cors");
const axios = require("axios");

const route = require("./resources/routes");
const db = require("./config/db");
const sortMiddleware = require("./app/middlewares/sortMiddleware");

const app = express();

db.connect();

//app.use(express.static(path.join(__dirname, "public")));
app.use(cors());
app.use(express.urlencoded({ extended: true }));
app.use(express.json());
app.use(methodOverride("_method"));
app.use(sortMiddleware);

app.engine(
  ".hbs",
  engine({
    extname: ".hbs",
    helpers: require("./helpers/handlebars.js")
  })
);
app.set("view engine", ".hbs");
app.set("views", path.join(__dirname, "./resources/views"));

route(app);

app.listen(3000);
