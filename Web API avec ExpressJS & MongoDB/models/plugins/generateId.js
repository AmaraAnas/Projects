module.exports = function(){

  return function generateId(schema){
    schema.pre('validate', function(next, done) {
      var instance = this;
      var model = instance.model(instance.constructor.modelName);

      if (instance.id == null) {
        model.findOne().sort('-id').exec(function(err, maxInstance) {
          if (err) {
            return done(err);
          } else {
            var maxId = 0;
            if (maxInstance) maxId = maxInstance.id;
            instance.id = maxId + 1;
            done();
          }
        });
      } else {
        done();
      }
    });
  }
};
