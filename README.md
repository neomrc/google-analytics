# Google Measurement Protocol
This package helps developers to make google analytics dispatches easy. Based on google's documentation: https://developers.google.com/analytics/devguides/collection/protocol/v1/devguide

<br/>
This is a pretty straightforward service. Here is a sample of an event hit:

```
use Neomrc\GoogleAnalytics\GoogleAnalyticsService;
...
try {
    $tracker = new GoogleAnalyticsService()->track('event');
    $tracker->setCategory('categoryFoo');
        ->setAction('actionBar');
        ->send();
} catch (\Exception $e) {
    // tracker sending failed
}
```

<br/>

### Possible hit types

<small>_Note: types are case-sensitive_</small>
- `event`
- `pageview`

<br/><br/>

#### Pageview 
Methods | Required | Value Type
--- | --- | ---
`setDocumentHostname` | `false` | `string`
`setPage` | `false` | `string`
`setTitle` | `false` | `string`

<br/><br/>

#### Event 
Methods | Required | Value Type
--- | --- | ---
`setCategory` | `true` | `string`
`setAction` | `true` | `string`
`setLabel` | `false` | `string`
`setValue` | `false` | `string`

<br/>

###### This is my first package. I hope someone will find this useful.
