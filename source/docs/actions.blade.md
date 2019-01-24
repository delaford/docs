---
title: Actions
description: What makes the game act
extends: _layouts.documentation
---

Every list item in a context-menu is an `Action()`. Located at the heart of `server/player/action.js`, the `Action()` class is straight forward and simple. Most of the meat of its method reside in the player handler file at `server/player/handler`.

## new Action()

When you click any item in a context-menu, the event fires off `player:context-menu:action` to the server. Upon reading it, the following happens:

```javascript
'player:context-menu:action': (incoming) => {
	const miscData = incoming.data.data.item.miscData || false;
	const action = new Action(incoming.data.player.socket_id, miscData);
	action.do(incoming.data.data, incoming.data.queueItem);
},
```

The **miscData** is data attached based on the `context`. For example, if the `context` is `wearSlot`, the *miscData* will be the `integer` of the slot it clicked on. If it's `inventorySlot`, then it will attached the slot # it clicked on.

Upon the execution `do()`, the action prepares the data for the player event handler. It will also make some calculations such as the tile ID it clicked on (if applicable), and to queue other actions (if applicable). After all is done, the player events handler takes over.

## action.do()

When an action is executed, it uses the `actionId` provided and looks inside the `server/players/handlers/actions/index.js` and looks for the appropriate method.

Then, it will perform the task and hand and update the global `world` object accordingly and send the Socket update back to the client or all clients.