let currHostname = php_vars.input_hostname ? php_vars.input_hostname : window.location.hostname;

// DEBUG
//console.log('currHostname = ' + currHostname);

let links = document.links;
for (let i = 0, linksLength = links.length ; i < linksLength ; i++) {
  if (links[i].hostname !== currHostname) {
    links[i].target = '_blank';
    links[i].rel = 'noreferrer noopener';
  } else {
    links[i].target = '_self';
    links[i].removeAttribute('rel');
  }
}