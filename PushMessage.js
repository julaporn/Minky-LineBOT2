
const functions = require("firebase-functions");
const request = require("request-promise");

const LINE_MESSAGING_API = "https://api.line.me/v2/bot/message";
const LINE_HEADER = {
  "Content-Type": "application/json",
  "Authorization": "Bearer 4ipMPNdnISFqBZJ+Zdx4cvMn8/L+RaD76H7xDQJElyeWKQsLD2qh86aVmXs+wHu3o0BmRn83h0ibHrMwGAFr3H5WHe5dzmYi4Ik13FjFDCB9RAC4wZPwenW+CItiqydLDaAK05DZreUfsHU42wNBcgdB04t89/1O/w1cDnyilFU=
"
};

exports.BasicMessage = functions.https.onRequest((req, res) => {
  return request({
    method: "POST",
    uri: `${LINE_MESSAGING_API}/push`,
    headers: LINE_HEADER,
    body: JSON.stringify({
      to: "U930cda3cddf9ba7693afa910d00858eb",
      messages: [{
          type: "text",
          text: "LINE \uDBC0\uDC84 x \uDBC0\uDCA4 Firebase"
      }]
    })
  }).then(() => {
      return res.status(200).send("Done");
  }).catch(error => {
      return Promise.reject(error);
  });
});