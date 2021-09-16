
Specify a date range only if:

- You apply conditions or ordering that reference performance metric fields. 
- You want to get performance data for the objects you're selecting. For example, if you plan to call the `getStats()` method. 

You may specify the date parameters using strings or objects. To use strings, specify the date in the form, YYYYMMDD. If you use objects, create an object with the following fields:

- year
- month
- day

For example:

```javascript
var date = {year: 2018, month: 5, day: 13};
```

The month is one-based where 1 is January and 12 is December.

The date range is inclusive. If you specify multiple date ranges, only the last date range is used.
