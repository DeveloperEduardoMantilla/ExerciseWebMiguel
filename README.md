### Exercise 1

> ***Name*** -> ***Hello World!***

## Instructions

The classical introductory exercise. Just say "Hello, World!".

["Hello, World!"](https://en.wikipedia.org/wiki/"Hello,_world!"_program) is the traditional first program for beginning programming in a new language or environment.

The objectives are simple:

- Write a function that returns the string "Hello, World!".
- Run the test suite and make sure that it succeeds.
- Submit your solution and check it at the website.

If everything goes well, you will be ready to fetch your first real exercise.

## Solution

````php
<?php
function helloWorld()
{
    return "Hello, World!";
}
````



### Exercise 2

> ***Name*** -> ***Reverse String***

## Instructions

Reverse a string

For example: input: "cool" output: "looc"

## Solution 

````php
<?php
function reverseString(string $text): string {
    $result = strrev($text);
    return $result;     
}
````



### Exercise 3 

## Instructions

If you want to build something using a Raspberry Pi, you'll probably use *resistors*. For this exercise, you need to know two things about them:

- Each resistor has a resistance value.
- Resistors are small - so small in fact that if you printed the resistance value on them, it would be hard to read.

To get around this problem, manufacturers print color-coded bands onto the resistors to denote their resistance values. Each band has a position and a numeric value.

The first 2 bands of a resistor have a simple encoding scheme: each color maps to a single number.

In this exercise you are going to create a helpful program so that you don't have to remember the values of the bands.

These colors are encoded as follows:

- Black: 0
- Brown: 1
- Red: 2
- Orange: 3
- Yellow: 4
- Green: 5
- Blue: 6
- Violet: 7
- Grey: 8
- White: 9

The goal of this exercise is to create a way:

- to look up the numerical value associated with a particular color band
- to list the different band colors

Mnemonics map the colors to the numbers, that, when stored as an array, happen to map to their index in the array: Better Be Right Or Your Great Big Values Go Wrong.

More information on the color encoding of resistors can be found in the [Electronic color code Wikipedia article](https://en.wikipedia.org/wiki/Electronic_color_code)

## Solution 

````php
<?php


const COLORS = array(
    "black",
    "brown",
    "red",
    "orange",
    "yellow",
    "green",
    "blue",
    "violet",
    "grey",
    "white"
);
function colorCode(string $color): int
{
    return array_search($color, COLORS);
}
````



#### **Exercise** **4**

> ***Name*** -> ***Hamming***

## Instructions

Calculate the Hamming Distance between two DNA strands.

Your body is made up of cells that contain DNA. Those cells regularly wear out and need replacing, which they achieve by dividing into daughter cells. In fact, the average human body experiences about 10 quadrillion cell divisions in a lifetime!

When cells divide, their DNA replicates too. Sometimes during this process mistakes happen and single pieces of DNA get encoded with the incorrect information. If we compare two strands of DNA and count the differences between them we can see how many mistakes occurred. This is known as the "Hamming Distance".

We read DNA using the letters C,A,G and T. Two strands might look like this:

```
GAGCCTACTAACGGGAT
CATCGTAATGACGGCCT
^ ^ ^  ^ ^    ^^
```

They have 7 differences, and therefore the Hamming Distance is 7.

The Hamming Distance is useful for lots of things in science, not just biology, so it's a nice phrase to be familiar with :)

The Hamming distance is only defined for sequences of equal length, so an attempt to calculate it between sequences of different lengths should not work. The general handling of this situation (e.g., raising an exception vs returning a special value) may differ between languages.



## Solution 

````php
<?php

function distance(string $a, string $b): int
{
    if (strlen($a) !== strlen($b)) {
        throw new InvalidArgumentException('DNA strands must be of equal length.');
    }
    return count(
        array_diff_assoc(
            str_split($a),
            str_split($b)
        )
    );
}

?>
````



### Exercise 5

## Introduction

The way we measure time is kind of messy. We have 60 seconds in a minute, and 60 minutes in an hour. This comes from ancient Babylon, where they used 60 as the basis for their number system. We have 24 hours in a day, 7 days in a week, and how many days in a month? Well, for days in a month it depends not only on which month it is, but also on what type of calendar is used in the country you live in.

What if, instead, we only use seconds to express time intervals? Then we can use metric system prefixes for writing large numbers of seconds in more easily comprehensible quantities.

- A food recipe might explain that you need to let the brownies cook in the oven for two kiloseconds (that's two thousand seconds).
- Perhaps you and your family would travel to somewhere exotic for two megaseconds (that's two million seconds).
- And if you and your spouse were married for *a thousand million* seconds, you would celebrate your one gigasecond anniversary.

> If we ever colonize Mars or some other planet, measuring time is going to get even messier. If someone says "year" do they mean a year on Earth or a year on Mars?
>
> The idea for this exercise came from the science fiction novel ["A Deepness in the Sky"](https://www.tor.com/2017/08/03/science-fiction-with-something-for-everyone-a-deepness-in-the-sky-by-vernor-vinge/) by author Vernor Vinge. In it the author uses the metric system as the basis for time measurements.

## Instructions

Your task is to determine the date and time one gigasecond after a certain date.

A gigasecond is one thousand million seconds. That is a one with nine zeros after it.

If you were born on *January 24th, 2015 at 22:00 (10:00:00pm)*, then you would be a gigasecond old on *October 2nd, 2046 at 23:46:40 (11:46:40pm)*.



## Solution

````php
<?php

function from(DateTimeImmutable $date): DateTimeImmutable
{
    $giga = 1e9; // = 1000000000
    return $date->modify("+{$giga} seconds");
}

````

### Exercise 6

## Introduction

Instructions
Tally the results of a small football competition.

Based on an input file containing which team played against which and what the outcome was, create a file with a table like this:

Team                           | MP |  W |  D |  L |  P
Devastating Donkeys            |  3 |  2 |  1 |  0 |  7
Allegoric Alaskans             |  3 |  2 |  0 |  1 |  6
Blithering Badgers             |  3 |  1 |  0 |  2 |  3
Courageous Californians        |  3 |  0 |  1 |  2 |  1
What do those abbreviations mean?

MP: Matches Played
W: Matches Won
D: Matches Drawn (Tied)
L: Matches Lost
P: Points
A win earns a team 3 points. A draw earns 1. A loss earns 0.

The outcome should be ordered by points, descending. In case of a tie, teams are ordered alphabetically.

Input
Your tallying program will receive input that looks like:

Allegoric Alaskans;Blithering Badgers;win
Devastating Donkeys;Courageous Californians;draw
Devastating Donkeys;Allegoric Alaskans;win
Courageous Californians;Blithering Badgers;loss
Blithering Badgers;Devastating Donkeys;loss
Allegoric Alaskans;Courageous Californians;win
The result of the match refers to the first team listed. So this line:

Allegoric Alaskans;Blithering Badgers;win
means that the Allegoric Alaskans beat the Blithering Badgers.

This line:

Courageous Californians;Blithering Badgers;loss
means that the Blithering Badgers beat the Courageous Californians.

And this line:

Devastating Donkeys;Courageous Californians;draw
means that the Devastating Donkeys and Courageous Californians tied.


## Solution

````php
<?php
class Tournament
{
    /** @var TeamScore[] */
    private array $teams = [];
    public function tally(string $score): string
    {
        if ($score !== '') {
            foreach (explode("\n", $score) as $line) {
                [$teamA, $teamB, $result] = explode(';', $line);
                $this->teams[$teamA] ??= new TeamScore($teamA);
                $this->teams[$teamB] ??= new TeamScore($teamB);
                switch ($result) {
                    case 'win':
                        $this->teams[$teamA]->addWin();
                        $this->teams[$teamB]->addLoss();
                        break;
                    case 'draw':
                        $this->teams[$teamA]->addDraw();
                        $this->teams[$teamB]->addDraw();
                        break;
                    case 'loss':
                        $this->teams[$teamA]->addLoss();
                        $this->teams[$teamB]->addWin();
                }
            }
        }
        //La función de comparación utiliza una expresión de comparación de la nave espacial <=> para ordenar los equipos primero por puntos de forma descendente y luego por nombre de forma ascendente.
        usort($this->teams, static fn(TeamScore $a, TeamScore $b) =>
            [$b->getPoints(), $a->getName()] <=> [$a->getPoints(), $b->getName()]
        );
        return implode("\n", ["Team                           | MP |  W |  D |  L |  P", ...$this->teams]);
    }
}
class TeamScore
{
    private string $team;
    private int    $wins   = 0;
    private int    $losses = 0;
    private int    $draws  = 0;
    public function __construct(string $team)
    {
        $this->team = $team;
    }
    public function addWin(): void
    {
        $this->wins++;
    }
    public function addLoss(): void
    {
        $this->losses++;
    }
    public function addDraw(): void
    {
        $this->draws++;
    }
    public function __toString()
    {
        return sprintf(
            '%-31s|  %d |  %d |  %d |  %d |  %d',
            $this->team,
            $this->getMatchesPlayed(),
            $this->wins,
            $this->draws,
            $this->losses,
            $this->getPoints()
        );
    }
    public function getMatchesPlayed(): int
    {
        return $this->wins + $this->losses + $this->draws;
    }
    public function getPoints(): int
    {
        return 3 * $this->wins + $this->draws;
    }
    public function getName(): string
    {
        return $this->team;
    }
}

````

