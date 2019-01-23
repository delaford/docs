---
title: Node Server
description: Making the game interactive
extends: _layouts.documentation
---

When you run the game, you are using Node.js and the `ws` library for the server-side Web Socket architecture. Node.js runs the web server through its [HTTP module](https://nodejs.org/api/http.html#http_http_createserver_options_requestlistener) serving it along with the Express node framework. 

Upon production releases, we use `pm2` to start and manage the Node server. We transpile the Node.js using Babel.

## World Object

Every new server has a global `world` object, located at `server/core/world.js`, that keeps track of all things and listens for incoming connections and requests to properly update other connected clients.

```json
{
  socket: {},
  map: {
    foreground: [],
    background: [],
  },
  npcs: [],
  items: [],
  respawns: {
    items: [],
    monsters: [],
  },
  monsters: [],
  players: [],
  clients: [],
}
```

### Socket

Global socket listener for every incoming client.


### Map

The **foreground** is a current `array` of tile's ID for objects, structures, walls, etc. The **background** is the same but for the surface layer (grass, dirt, roads, etc.) 

### NPCs

Current list of NPCs in-game

### Items

Current list of items on the game map floors -- whether or respawn or dropped by player.

### Respawns

Current tracking of items and monsters that have been repawned and their current status.

### Monsters

Current list of Monsters in-game that are alive.

### Players

Current list of players logged into the game.

### Clients

Socket connection of players logged into the game. Their `socket_id` is attached to the `world.player` objects listed above as a relation.

## Debugging

When debugging the Node.js server (`server.js`), a package comes installed called `ndb` (node debugging). You can run it by running `npm run ndb` which will fire up the local `ndb`. Once activated, you can start the npm `dev:node` script from the left-hand side.

`dev:node` executes the Node.js server using `nodemon` for auto-restarts upon code changes and `babel-node` to transpile latest code into legancy-complaint code.

You can also, without needing to debug, just simply run `npm run dev:node` to quickly start the server and see what's going on.