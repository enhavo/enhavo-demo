const EnhavoEncore = require('@enhavo/core/EnhavoEncore');
const AppPackage = require('@enhavo/app/Encore/AppPackage');
const AppThemePackage = require('@enhavo/app/Encore/AppThemePackage');
const FormPackage = require('@enhavo/form/Encore/FormPackage');

EnhavoEncore.add(
  'enhavo',
  [new AppPackage(), new FormPackage()],
  Encore => {},
  config => {}
);

EnhavoEncore.add(
  'theme',
  [new AppThemePackage()],
  Encore => {
    Encore.addEntry('base', './assets/theme/base.js');
  },
  config => {}
);

module.exports = EnhavoEncore.export();
