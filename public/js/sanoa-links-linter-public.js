(function () {
  "use strict";

  console.info('Sanoa Links Linter running ...');

  /**
   * Sanoa Links Linter main JS Function
   */

  let currHostname = php_vars.input_hostname
    ? php_vars.input_hostname
    : window.location.hostname;

  let links = document.links;
  for (let i = 0, linksLength = links.length; i < linksLength; i++) {
    if (links[i].hostname !== currHostname) {
      links[i].target = "_blank";
      links[i].rel = "noreferrer noopener";
    } else {
      links[i].target = "_self";
      links[i].removeAttribute("rel");
    }
  }
})();
