# JsonScript
JsonScript is an easy to use json parser for quickly iterating through json files.

## Disclaimer
This project is early in development, so expect tons of bugs and bad written code.

## About
JsonScript aims to be a faster alternative to writing 100 lines of code just to parse 
a big json configuration provided to you by your code editor. 

## Requirements
Make sure to own the 8.2 version of the PHP interpreter.

## Example

```js
# FILE: sets the json file we want to parse.
FILE "example.json"
# GET: attempts to get the specified key.
GET "example key" 
# PRINT: attempts to print the value associated with the key.
PRINT
# END: Marks the end of the script.
END
```

## License
This project is licensed under the terms and conditions of the Apache License v2.0, read more
at https://www.apache.org/licenses/LICENSE-2.0.