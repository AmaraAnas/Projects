#include "mainloop.agc"
#include "gamesettings.agc"
#include "media.agc"
#include "menu.agc"
#include "questions.agc"

Type _obj
    img
    spr
    x#
    y#
    sx#
    sy#
    w
    h
    xflag
    yflag
    point
EndType

Type _question
    query$
    answer$
    prop1$
    prop2$
    prop3$
EndType

Type _media
    theme
    ball
    error
EndType


`def des objet et media
bg_hovered as _obj
gameover_bg as _obj
winbg as _obj
title as _obj
hs as _obj
background as _obj
bg_settings as _obj
ballons as _obj
play as _obj
closebtn as _obj
returne as _obj
returne2 as _obj
quit as _obj
quit2 as _obj
soundic as _obj
soundoff as _obj
settings as _obj
highs as _obj
blank as _obj
blankscore as _obj
blanklives as _obj
ball1 as _obj
ball2 as _obj
ball3 as _obj
ball4 as _obj
bonhomme as _obj
evil as  _obj
obstacle1 as  _obj
obstacle2 as  _obj
rightanswer as  _obj
null as  _obj
music as _media
sound as _media


Dim questions[50] as _question
Gosub tabrempl
Gosub Game_Settings
Gosub Environment_Setup
Gosub Load_Music
Gosub Load_Sounds
Gosub Load_Images
Gosub Create_Sprites
Gosub Set_Sprites_Properties
Gosub Setup_Text
Gosub Setup_questions
Gosub Readscore
Gosub MenuGame
Gosub Randomize_BH
Gosub Randomize_evil
Gosub Randomize_Ball1
Gosub Randomize_Ball2
Gosub Randomize_Ball3
Gosub Randomize_Ball4


DO
Gosub Update_BH
Gosub Wall_Detection1
Gosub Wall_Detection2
Gosub Wall_Detection3
Gosub Wall_Detection4
Gosub Update_ball1
Gosub Update_ball2
Gosub Update_ball3
Gosub Update_ball4
Gosub update_propositon
Gosub Right_Detect_Collision
Gosub BH_Wall_Detection
Gosub enemychaser
Gosub closegame
Gosub death
Gosub win
Gosub Lives_Check
Sync()

Loop




