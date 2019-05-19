# Google Measurement Protocol
This package helps developers to make google analytics dispatches easy. Based on google's documentation: https://developers.google.com/analytics/devguides/collection/protocol/v1/devguide

<br/>

###### To start do:

```composer require neomrc/google-analytics```

<br/>
This is a pretty straightforward service. Here is a sample of an event hit:

```
use Neomrc\GoogleAnalytics;
...
try {
    $tracker = new GoogleAnalytics()->track('event');
    $tracker->setCategory('categoryFoo');
        ->setAction('actionBar');
        ->send();
} catch (\Exception $e) {
    // tracker sending failed
}
```
<br/>

To instantiate:
> new GoogleAnalytics()->track(`<enter hit type here>`);

<br/>

`This will initialize the hit type class in which you can set the values by using the methods below`

<br/>

Set Tracking ID:
> ->setTrackingId(`<trackingId>`)

<br/>

Set User ID:
> ->setUserId(`<userId>`)

<br/><br/>

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

<br/><br/>

To send/dispatch the analytics object
> ->send(`<optional array of data here ['key' => 'value']>`)

<br/>

###### This is my first package. I hope someone will find this useful.
