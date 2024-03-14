const express = require("express");
const mongoose = require("mongoose");

const app = express();
const Schema = mongoose.Schema;
const router = express.Router();

const courseSchema = new Schema{
  _id: {type: Number},
  name: {type: String, default:"hi"}
};

const Course = mongoose.model("Course", courseSchema);

app.use("/", router.get("/", function(req, res, next){
  Course.find({})
    .then((course)=>{
      res.render("home", {
        courses: multimongooseToOpject(course)
      })
    })
    .catch(next);
  });
);

app.listen(3000);
