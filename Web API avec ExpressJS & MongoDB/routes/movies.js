var express = require('express');
var Movie = require('../models/movie');
var router = express.Router();
var bodyParser = require('body-parser');
var mongoose = require('mongoose');
var Actor = require('../models/actor');

router.use(bodyParser.json());
module.exports = router;

  /* GET /todos listing. */
router.get('/', function(req, res, next) {
    Movie.find(function(err, movies) {
      if (err) return res.status(400).json(err);

      res.status(200).json(movies);
    });
});



    /* POST /todos */
    router.post('/', function(req, res, next) {
    Movie.create(req.body, function(err, movie) {
      if (err) return res.status(400).json(err);

      res.status(201).json(movie);
    });
    });


      /* GET /todos/id */
      router.get('/:id', function(req, res, next) {
    Movie.findOne({ id: req.params.id })
    .populate('actors')
    .exec(function(err, movie) {
      if (err) return res.status(400).json(err);
      if (!movie) return res.status(404).json();
      res.status(200).json(movie);
    });
      });



/*
  updateOne: function(req, res, next) {
    Movie.findOneAndUpdate({ id: req.params.id }, req.body, function(err, movie) {
      if (err) return res.status(400).json(err);
      if (!movie) return res.status(404).json();

      res.status(200).json(movie);
    });
  },


  deleteOne: function(req, res, next) {
    Movie.findOneAndRemove({ id: req.params.id }, function(err) {
      if (err) return res.status(400).json(err);

      res.status(204).json();
    });
  },


  addActor: function(req, res, next) {
    Movie.findOne({ id: req.params.id }, function(err, movie) {
      if (err) return res.status(400).json(err);
      if (!movie) return res.status(404).json();

      Actor.findOne({ id: req.body.id }, function(err, actor) {
        if (err) return res.status(400).json(err);
        if (!actor) return res.status(404).json();

        movie.actors.push(actor);
        movie.save(function(err) {
          if (err) return res.status(500).json(err);

          res.status(201).json(movie);
        });
      })
    });
  },


  deleteActor: function(req, res, next) {
    Movie.findOne({ id: req.params.id }, function(err, movie) {
      if (err) return res.status(400).json(err);
      if (!movie) return res.status(404).json();

      // HACK TO CHANGE
      movie.actors = [];
      movie.save(function(err) {
        if (err) return res.status(400).json(err);

        res.status(204).json(movie);
      })
    });
  }

  */



