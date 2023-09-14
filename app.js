
//we can set animation delay as following in ms (default 1000)
ProgressBar.singleStepAnimation = 0;
ProgressBar.init(
    ['Reģistrācija',
    'Līguma slēgšana',
    'Teorētiskās nodarbības apmaksa',
    'Teorētiskās nodarbības uzsākšana',
    'Teorētiskās nodarbības beigšana',
    'Braukšanas apmaksa',
    'Braukšanas uzsākšana',
    'Braukšanas pabeigšana',
    'Autoskolas pabeigšana'
  ],
  'Līguma slēgšana',
  'progress-bar-wrapper' // created this optional parameter for container name (otherwise default container created)
);