const mongoose = require("mongoose");
const slug = require("mongoose-slug-generator");
const mongooseDelete = require("mongoose-delete");
const AutoIncrement = require("mongoose-sequence")(mongoose);

mongoose.plugin(slug);
const Schema = mongoose.Schema;

const courseSchema = new Schema(
  {
    _id: { type: Number },
    name: { type: String, default: "hahaha" },
    des: { type: String, match: /[a-z]/ },
    image: { type: String },
    videoId: { type: String },
    slug: { type: String, slug: "name", unique: true },
    date: { type: Date, default: Date.now }
  },
  {
    _id: false,
    timestamps: true
  }
);

courseSchema.query.sortable = function (req) {
  if (req.query.hasOwnProperty("_sort")) {
    return this.sort({
      [req.query.column]: req.query.type
    });
  }
  return this;
};

courseSchema.plugin(AutoIncrement);

courseSchema.plugin(mongooseDelete, {
  overrideMethods: "all",
  deletedAt: true
});

module.exports = mongoose.model("Course", courseSchema);
