   M S B A M L   `   `   `  ����F  BMediaPlayer, Version=1.0.0.0, Culture=neutral, PublicKeyToken=null)clr-namespace:MediaPlayerMediaPlayer  5   	       MediaPlayer.MainWindow   5   	   W SPresentationCore, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35R NWindowsBase, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35\ XPresentationFramework, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35D 9http://schemas.microsoft.com/winfx/2006/xaml/presentation    5   	   R NSystem.Xaml, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089:x,http://schemas.microsoft.com/winfx/2006/xaml     5   	   @d2http://schemas.microsoft.com/expression/blend/2008     5   	   Jmc;http://schemas.openxmlformats.org/markup-compatibility/2006     5   	   +localclr-namespace:MediaPlayer     5   	     � Title$  
MainWindow��5   	   $	��600��6   $	��500��6)   .��5
      � $��	0,0,0,-31q�6    � RowDefinitions 5   
   �� 5      $
��320* �6   �� 5      $	��50* �6   �� 5      $
��100* �6   .+�5   
   r� -   5         r�Name$ MediaPlayer��5      $��1��6,    r� LoadedBehavior$ Manual=�6=   $��	0,39,0,10q�6U   �� 5   
    �� Orientation$ 
Horizontal=�6   $��1��6.   $��Center=�6;   .+�5      �� -   5         ��Name$ btnPlay��5      $
��Play��6&   $��50��6K   $��25��6V   $��5q�6b   �� 5      -   5        $ btnMoveBack��5      $
��Back��6*   $��50��6S   $��25��6^   $��5q�6j   �� 5      -   5        $ btnMoveForward��5      $��Forward��6-   $��50��6\   $��25��6g   $��5q�6s   �� 5      -   5        $ btnOpen��5      $
��Open��6&   $��50��6K   $��25��6V   $��5q�6b   5      �� 5   
   $��3��6   ��5      �� 5      .R�5      �  � ColumnDefinitions 5      �� 5       $
��Auto �6/   �� 5!      $��* �6/   �� 5"      $
��Auto �6/   5$      5%      .@�5'      �� .��5(      �� -   5        $��lblTime��5(      
00:00:0065   5)      �� 5*      $��1��6   $��Stretch=�6,   .��5+      �� -   5        $��sliProgress��5+      6�   5,      5-      51      54      