---
title: Event Handler
description: Manage events on the game and via WebSocket
extends: _layouts.documentation
---

The game uses [Web Sockets](https://developer.mozilla.org/en-US/docs/Web/API/WebSocket) to transmit data from the Node.js server to and from the client and server. This allows for the real-time updates of the map changes such as players, actions from players, NPC and Monster movements and more.

On the client, we use the `ws` Web Socket library.

# Socket Handler

On the `server`, every new user that connects gets assigned a `uuid` and the `server:send:items` is emitted to them. They are then added the `world` client array to keep track of the Socket connection. 

Upon recieving `server:send:items`, they are given a list of wearable items which is used in the `ui.js` library in the `getItemData` method to be used for client-side data tooltips.

## On Message

When a message is `emitted` and received via `ws.on('message')` for the server and `onmessage()` for the client, it goes through a handler that then delegates the event accordingly to its appropriate function.

## Client-side

On the client, the main `Socket` handler located in `src/core/player/events.js`. From there, the events are split up into sections for better clarity and readability.

@include('_partials.class-table', [
	'headers' => ['Event', 'Description'],
	'rows' => [
		[
			'Player',
			"Player says, Player initiates trade, Player attack, etc.",
		],
		[
			'Item',
			"Plaque Push, Fling Wand, etc.",
		],
		[
			'Resources',
			"Mine Rocks, Fish Spot, Smith Bars, etc.",
		],
		[
			'NPCs',
			"Attack NPC, Trade with NPCs, etc."
		],
		[
			'World',
			'Item dropped, item respawn, etc.'
		]
	]
])

The one event that goes across multiple sections (NPC, Item, and Resources) is the `examine` event which is the action in which the event describes the noun you are interaction with.

### Undefined Events

Sometimes, events coming from the server do not need manipulation and thus will skip the `Event` handler and go straight through the `bus.$emit()` method and enact on whatever component it must.

For example, the `game:context-menu:items` is when a user right-clicks on the game. The client-side event handler cannot find any method called `game:context-menu:items` and thus will send it via the `bus` handler.

> The `bus` handler is a client-side handler that allows communication between Vue components and/or JavaScript files and Vue components.

## Server-side

On the server, there are two main areas in events. The main event file located in `server/player/handler.js`.

@include('_partials.class-table', [
	'headers' => ['Event', 'Description'],
	'rows' => [
		[
			'Socket',
			"Player login, Player Say, queue action, etc.",
		],
		[
			'Action',
			"Actions from the context-menu",
		]
	]
])

From there, the events are handled via their respective files and update the `world` object accordingly.
