import * as React from 'react';
import { View, Text } from 'react-native';

export default function Carrello({ navigation }) {
    return (
        <View style={{ flex: 1, alignItems: 'center', justifyContent: 'center' }}>
            <Text
                onPress={() => navigation.navigate('Carrello')}
                style={{ fontSize: 26, fontWeight: 'bold' }}>Carrello</Text>
        </View>
    );
}