## Installation

### Update your project root _composer.json_

1 Make sure that repository source has been defined:
```
"repositories": [
    ...
    {"type": "git", "url": "git@gitlab.com:lms3/core/support.git"}
]
```

2 Add the extension to the _require_ section:
```
"require": {
    ...
    "lms3/support": "*"
  }
```
