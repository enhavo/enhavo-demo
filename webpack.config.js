const EnhavoEncore = require('@enhavo/core/EnhavoEncore');
const EnhavoThemeEncore = require('@enhavo/theme/Encore/EnhavoThemeEncore');
const ThemeLoader = require('@enhavo/theme/Encore/ThemeLoader');
const AppPackage = require('@enhavo/app/Encore/AppPackage');
const AppThemePackage = require('@enhavo/app/Encore/AppThemePackage');
const FormPackage = require('@enhavo/form/Encore/FormPackage');
const ThemePackage = require('@enhavo/theme/Encore/ThemePackage');

EnhavoEncore.add(
  'enhavo',
  [
    new AppPackage(),
    new FormPackage(),
  ],
  Encore => {},
  config => {}
);

EnhavoThemeEncore.addThemes(EnhavoEncore, ThemeLoader, [
  new AppThemePackage({
    themesPath: './assets/theme'
  }),
  new ThemePackage(ThemeLoader),
]);

module.exports = EnhavoEncore.export();
