# BDCASH Block Explorer

## Requirements

-   Linux or Windows server of running BDCASH Core
-   BDCASH Core v2.x.x.x
-   Apache 2.4.x
-   PHP 5.6.x with CURL and JSON support enabled

## Installation

Installation is quite simple, and just complete the following steps:

-   Upload the contents of the archive to your server.
-   Modify the conf/config.php file with your own info and BDCASH RPC info.
-   That's it! Open your any Modern Browsers to the install URL, and the block explorer should come up.

Note:

1. If you do not know about apache url_rewrite, please turn off the url_rewrite configuration in conf/config.php file;

## Usage

Below shows the URLs available:

-   / = Home page, showing recent blocks list.
-   /masternodes = Showing masternodes list.
-   /block/HEIGHT = displays all detail and txs within a block.
-   /blockhash/HASH = displays all detail and txs within a block.
-   /tx/TXID = View a single tx

## Theme / Template Modifications

-   Content css, js, img, pages, header and footer files are in /themes/theme1/ directory.
-   CSS uses Bootstrap 3.x as requested.

## Donations

---

BDCASH: 

ETH:

BTC:

LTC:

## License

---

MIT

## Changelog



1.0.0 2022-01-03

first release;
