tabrempl:
fileID = OpenToRead ( "file.txt" )
OpenToRead ( 1, "file.txt" )
c$ = ReadString ( 1 )
CloseFile ( 1 )
i = 1
 while (GetStringToken( c$, ";", i )<> "")
    q as _question
    item$ = GetStringToken( c$, ";", i )
    q.query$ = GetStringToken( item$, ":", 1)
    q.answer$ = GetStringToken( item$, ":", 2)
    q.prop1$ = GetStringToken( item$, ":", 3)
    q.prop2$ = GetStringToken( item$, ":", 4)
    q.prop3$ = GetStringToken( item$, ":", 5)
    questions[i-1] = q
   i = i+1
endwhile

return


updatehightscore:

FileR = OpenToRead( "score.txt" )
s0 as String  = ReadLine( FileR )
s1 as String  = ReadLine( FileR )
s2 as String  = ReadLine( FileR )
s3 as String  = ReadLine( FileR )
s4 as String  = ReadLine( FileR )
CloseFile(FileR)

dim array[5]as Integer
array[0] = val(s0)
array[1] = val(s1)
array[2] = val(s2)
array[3] = val(s3)
array[4] = val(s4)
array[5] = score


For i = 0 To 5
    For j = i + 1 To 5
        If (array [i] > array[j])
            temp = array[i]
            array[i] = array[j]
            array[j] = temp
        EndIf
    Next j
Next i

File = OpenToWrite ( "score.txt",0 )
WriteLine( File, str(array[5]) )
WriteLine( File, str(array[4]) )
WriteLine( File, str(array[3]) )
WriteLine( File, str(array[2]) )
WriteLine( File, str(array[1]) )
CloseFile ( File)


FileR = OpenToRead( "score.txt" )
s as String  = ReadString( FileR )
CloseFile(FileR)
setTextString(highscore,s)

gosub Readscore
return

Readscore:

FileR = OpenToRead( "score.txt" )
s as String  = ReadString( FileR )
CloseFile(FileR)
setTextString(highscore,s)

return
