const Course = require("./../models/Course");
const {
  multiMongooseObject,
  mongooseObject
} = require("./../../until/mongoose");

class SiteController {
  index(req, res, next) {
    Course.find({})
      .then((courses) => {
        res.render("home", {
          courses: multiMongooseObject(courses)
        });
      })
      .catch(next);
  }

  search(req, res, next) {
    Course.findOne({ name: req.query.name })
      .then((course) =>
        res.render("courses/show", {
          course: mongooseObject(course)
        })
      )
      .catch(next);
  }

  test(req, res, next) {
    Course.find({})
      .then((courses) => {
        res.send(multiMongooseObject(courses));
      })
      .catch(next);
  }
}
module.exports = new SiteController();
