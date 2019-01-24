---
title: Installation
description: null
extends: _layouts.documentation
---

Installing Delaford is quick and easy and you'll be up and running in less than a minute.


First, fork the repository. Then, go into your favorite terminal.

```bash
git clone git@github.com:YOUR_USERNAME/game.git
cd game
npm install
npm run serve
```

> `npm run serve` will start the development server and watch for changes on the client-side code inside the `src` folder and otherwise elsewhere applicable.

Now, while still inside the `game` folder, open another terminal session in that same location. Type and run `npm run dev:node`. This will start the Node.js game server.

> If you want to debug, type `npm run ndb`. `ndb` is Google Chrome's Node Debugging tool which allows Node.js programs to be easily debugged and see all its context and variables. Highly recommended for a much easier time.

Now you may visit `http://localhost:8080` to login and start developing.


## Configuration {#configuration}

Configuration in Delaford is straight forward and mostly for assets. It's located in `/server/config.js`. You will probably rarely touch this file but it's good to know in case you want to edit the map, its tileset and player placement.

The `player` object in `config` is where the player spawns on the map. The `map.color` object is the color of the cotext-menu actions. The rest is for tile assets and map size.