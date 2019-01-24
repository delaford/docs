---
title: Context Menu
description: Point-and-click your way to understanding
extends: _layouts.documentation
---

As Delaford is very much a point-and-click game, understanding the Context Menu is very important for development.

That being said, we know the current code at `server/core/context-menu.js` can be enhanced. There are many opportunities for abstraction and low-hanging fruit, if you'd like to make a PR.

Upon the instantiation of the `Context Menu` class, we take some parts of the global `world` object, take the current player and its mouse coordiantes and some misc data and get to work.

## Action List

The list of actions that can be performed by the player are located at `server/core/data/action-list.js`.  Most of the actions take some shape or form like this:

```json
{
	name: 'Mine',
	actionId: 'player:resource:mining:rock',
	context: ['gameMap'],
	allow: ['foreground'],
	nearby: 'edge',
	weight: 1,
	queueable: true,
}
```

### name

The label of action that is displayed on the context-menu. For example, `Mine Rocks` or `Examine Jatite Sword`.

### actionId

The unique ID that is used to identify and select the action between the socket and client handlers. It usually follows the notation of this:

- Subject doing the action
- On what context?
- With what action?
- Where is action performed on?

Those, when put together, are separated using a `:` character. For examples, here are some: `player:resource:mining:rock`, `player:left`, and `player:context-menu:action`.

### context

Where, on the UI, can this action take place? When you right-click on the UI, every element has a [class selector](https://developer.mozilla.org/en-US/docs/Web/CSS/Class_selectors). The most common one we'll use is `gameMap` for the game canvas.

Some actions, like `examine`, can have multiple contexts such as: `['gameMap', 'inventorySlot']`. `Equip` and `Unequip`, for example, have the `context` of `['wearSlot']`.

@include('_partials.class-table', [
	'headers' => ['Context', 'Description', 'For Actions Like...'],
	'rows' => [
		[
			'gameMap',
			"Did the user click on the game map?",
			'Examine, Walk Here, Take'
		],
		[
			'inventorySlot',
			"Did the user  click on an inventory slot?",
			'Examine, Drop, Equip'
		],
		[
			'wearSlot',
			"Did the user click on a `Wear` tab slot?",
			'Examine, Unequip'
		]
	]
])

### allow

The `allow` value gives the context-menu the ability on where to [check](#build-and-check). Some actions will allow on multiple entities like `examine` which has the `allow` of `['npc', 'item']`. Some have an `allow` of `foreground` which only allows an action on (certain) foreground objects like `player:resource:mining:rock`.

@include('_partials.class-table', [
	'headers' => ['Allow', 'Description'],
	'rows' => [
		[
			'foreground',
			"Check the coordinates of the foreground for specific entities.",
		],
		[
			'npc',
			"Check the coordinates for any NPC.",
		],
		[
			'item',
			"Check the coordinates for a specific item."
		]
	]
])

Actions can have multiple `allow` values and usually always have more than one.

### nearby

Every action needs precise location on where that action can and will take place. For example, sometimes an action can take place from anywhere. `examine` is one such example. Other times, an action will need to be exactly on the spot like `take` and other times, it has to be near it like `Mine` and `Push`.

@include('_partials.class-table', [
	'headers' => ['Nearby', 'Description', 'For Actions Like...'],
	'rows' => [
		[
			'edge',
			"Perform an action nearby the coordinates.",
			'Mine, Push'
		],
		[
			'exact',
			"Perform an action on top of a subject/resource.",
			'Take'
		],
		[
			'(false)',
			"Perform the action at the moment of execution.",
			'Examine, Equip'
		]
	]
])

If any action's `nearby` is anything but false, they will be eligiable to be [queued](#queueable) which means the player must reach there first before doing said action item.

### weight

Every action must be analyzed based on what kind of action it is. The more destructive actions like `Drop` and `Release` go near the bottom and thus have a higher `weight` count.

The more use you think an action will have, the lower count it receives. `examine`, for example, will always be somewhere in the middle but never at the top nor the bottom.

#### Walk-here and Cancel

The `cancel` action item is attached to every context-menu list generated no matter what to give the user a quick way out. It always at the end of every list.

`walk-here` is always attached to every list generated on the `gameMap` context. It's position determines on whether user has actions to perform on resources, items and other things. If that criteria is met, then the `walk-here` is then placed 1 item below the main function. If not, then that action item is always at the top.

### queueable

When an action is queueable, it means that that action can be chain with others. For example, `Take` can be chained with `walk-here`.

Queueables are most used for actions whose `nearby` is `edge` or `take`. From there, the `walk-here` action is executed while the Queue system waits for the `walk-here` action to finish before starting the next item in the queue.

## Build and Check

After we secure the mouse coordinates, where the user clicked on the map (23, 234) and where they clicked in the viewport (3, 5), we get to work building the context-menu. 

We start by going through the list of actions and filtering it by the `allow` of which they allow. 

The `check()` method then goes through the action's `context` to see which to cycle through. Then, the conditionals are checked and added to the list if they are met.