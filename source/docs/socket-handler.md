---
title: Socket Handler
description: Manage events from the client and server
extends: _layouts.documentation
features:
  responsive: true
---

The game uses [Web Sockets](https://developer.mozilla.org/en-US/docs/Web/API/WebSocket) to transmit data from the Node.js server to and from the client and server. This allows for the real-time updates of the map changes such as players, actions from players, NPC and Monster movements and more.

## Client-side

On the client, the main `Socket` handler located in `src/core/player/events.js`. From there, the events are split up into sections for better clarity and readability.

@include('_partials.helloworld')

- player: (player says, player initiates trade, player attack)
- item: (plaque push)
- resources (mine rocks, fish spot)
- npcs (attack, trade)
- worlds (item dropped, respawn)