---
title: Game Assets
description: Images, map, tilesets and more.
extends: _layouts.documentation
---

The images of actors, map datasets and tilesets are are handled in one area: `src/assets`. This is where you'll be doing most of the editing outside of the code editor, should you require it.

This is the general folder structure of assets.

```bash
assets/
├── audio/
	└── music
├── fonts/
├── github/
├── graphics/
	├── actors
	└── items
		└── original
	└── ui
		├── client
		└── mouse
├── scss/
	├── elements
	└── typography
└── tiles/
```

## Audio

The assets of audio files containing game music and interaction sound effects. Most of these are obtained using third-party websites where we either buy the license to use or are free and credit the creators.

## Fonts

Game fonts used are store in this location; as specified in `src/assets/scss/typography/font.scss`. The three fonts used are: 

1. Px437_IBM_PS2thin2 is used as `UIFont` in game panes, buttons, forms.
2. PxPlus_IBM_VGA8 is used as `ChatFont` for game chat.
3. PixelMix is used as `GameFont` is used in context-menu and UI fonts.

## GitHub

These assets are related to the VSC hosted. As of writing, Delaford is currently hosted on GitHub so the folder is `/github`. The assets here are mostly graphics and contain the `README.md` logo and its `.xcf` GIMP source file.

## Graphics

The graphics in the game are split up in three main groups: `Actors`, `Items`, and `UI`. The `Items` group contain the original source file (`.xcf`) and its exported images while the `Actors` and `UI` group just contain the exported image due to their simplicistic graphic nature.

All graphics in tilesets adhere to the `32x32` pixel-size nature due to the game constraints. It may be possible in the future to have `Monsters` be larger.

### Actors

The tilesets for `NPCs` and `Monsters` are located in this area. The main `player` graphic is located here as well. More player selections are due to be added when Classes are added in.

### Items

Items in the game are kept here in both their original `.xcf` format and exported images. In this folder, we seperate out the tileset in multiple groups due to the extensive amount of items in-game.

@include('_partials.class-table', [
	'headers' => ['Group', 'Description'],
	'rows' => [
		[
			'Armor',
			"Armor worn by player.",
		],
		[
			'Edible',
			"Potions, food, meat eaten by player.",
		],
		[
			'General',
			"General use items like coins, smithing bars, and arrows."
		],
		[
			'Jewelry',
			"Necklaces, rings, pendates worn by player."
		],
		[
			'Weapons',
			"Weapons used on monsters and others by player."
		]
	]
])

You can easily edit `.xcf` files using GIMP to add/modify/remove assets. Remember to update the `x`,`y` coordinates in their respective JavaScript files in `server/core/data` in `/foreground` and `/items` so that the respective image is shown in the tileset.
